<?php

namespace Xibo\Controller;

use Xibo\Entity\Campaign;
use Xibo\Entity\Layout;
use Xibo\Entity\Media;
use Xibo\Entity\Permission;
use Xibo\Entity\Playlist;
use Xibo\Entity\Region;
use Xibo\Entity\Widget;
use Xibo\Exception\AccessDeniedException;
use Xibo\Exception\ConfigurationException;
use Xibo\Exception\InvalidArgumentException;
use Xibo\Exception\XiboException;
use Xibo\Factory\ApplicationFactory;
use Xibo\Factory\CampaignFactory;
use Xibo\Factory\DisplayFactory;
use Xibo\Factory\DisplayGroupFactory;
use Xibo\Factory\LayoutFactory;
use Xibo\Factory\MediaFactory;
use Xibo\Factory\PageFactory;
use Xibo\Factory\PermissionFactory;
use Xibo\Factory\ScheduleFactory;
use Xibo\Factory\SessionFactory;
use Xibo\Factory\UserFactory;
use Xibo\Factory\UserGroupFactory;
use Xibo\Factory\UserTypeFactory;
use Xibo\Factory\WidgetFactory;
use Xibo\Helper\ByteFormatter;
use Xibo\Service\ConfigServiceInterface;
use Xibo\Service\DateServiceInterface;
use Xibo\Service\LogServiceInterface;
use Xibo\Service\SanitizerServiceInterface;
use Xibo\Storage\PdoStorageService;
use Xibo\Storage\StorageServiceInterface;

/**
 * Class User
 * @package Xibo\Controller
 */
class User extends Base
{
    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @var UserTypeFactory
     */
    private $userTypeFactory;

    /**
     * @var UserGroupFactory
     */
    private $userGroupFactory;

    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var PermissionFactory
     */
    private $permissionFactory;

    /**
     * @var LayoutFactory
     */
    private $layoutFactory;

    /**
     * @var ApplicationFactory
     */
    private $applicationFactory;

    /**
     * @var CampaignFactory
     */
    private $campaignFactory;

    /**
     * @var MediaFactory
     */
    private $mediaFactory;

    /**
     * @var ScheduleFactory
     */
    private $scheduleFactory;

    /** @var  DisplayFactory */
    private $displayFactory;

    /** @var SessionFactory */
    private $sessionFactory;

    /** @var  DisplayGroupFactory */
    private $displayGroupFactory;

    /** @var WidgetFactory */
    private $widgetFactory;

    /**
     * Set common dependencies.
     * @param LogServiceInterface $log
     * @param SanitizerServiceInterface $sanitizerService
     * @param \Xibo\Helper\ApplicationState $state
     * @param \Xibo\Entity\User $user
     * @param \Xibo\Service\HelpServiceInterface $help
     * @param DateServiceInterface $date
     * @param ConfigServiceInterface $config
     * @param UserFactory $userFactory
     * @param UserTypeFactory $userTypeFactory
     * @param UserGroupFactory $userGroupFactory
     * @param PageFactory $pageFactory
     * @param PermissionFactory $permissionFactory
     * @param LayoutFactory $layoutFactory
     * @param ApplicationFactory $applicationFactory
     * @param CampaignFactory $campaignFactory
     * @param MediaFactory $mediaFactory
     * @param ScheduleFactory $scheduleFactory
     * @param DisplayFactory $displayFactory
     * @param SessionFactory $sessionFactory
     * @param DisplayGroupFactory $displayGroupFactory
     * @param WidgetFactory $widgetFactory
     */
    public function __construct($log, $sanitizerService, $state, $user, $help, $date, $config, $userFactory,
                                $userTypeFactory, $userGroupFactory, $pageFactory, $permissionFactory,
                                $layoutFactory, $applicationFactory, $campaignFactory, $mediaFactory, $scheduleFactory, $displayFactory, $sessionFactory, $displayGroupFactory, $widgetFactory)
    {
        $this->setCommonDependencies($log, $sanitizerService, $state, $user, $help, $date, $config);

        $this->userFactory = $userFactory;
        $this->userTypeFactory = $userTypeFactory;
        $this->userGroupFactory = $userGroupFactory;
        $this->pageFactory = $pageFactory;
        $this->permissionFactory = $permissionFactory;
        $this->layoutFactory = $layoutFactory;
        $this->applicationFactory = $applicationFactory;
        $this->campaignFactory = $campaignFactory;
        $this->mediaFactory = $mediaFactory;
        $this->scheduleFactory = $scheduleFactory;
        $this->displayFactory = $displayFactory;
        $this->sessionFactory = $sessionFactory;
        $this->displayGroupFactory = $displayGroupFactory;
        $this->widgetFactory = $widgetFactory;
    }

    /**
     * Controls which pages are to be displayed
     */
    function displayPage()
    {
        $this->getState()->template = 'user-page';
        $this->getState()->setData([
            'userTypes' => $this->userTypeFactory->query()
        ]);
    }

    /**
     * Me
     *
     * @SWG\Get(
     *  path="/user/me",
     *  operationId="userMe",
     *  tags={"user"},
     *  summary="Get Me",
     *  description="Get my details",
     *  @SWG\Response(
     *      response=200,
     *      description="successful operation",
     *      @SWG\Schema(ref="#/definitions/User")
     *  )
     * )
     */
    public function myDetails()
    {
        // Return
        $this->getState()->hydrate([
            'httpStatus' => 200,
            'data' => $this->getUser()
        ]);
    }

    /**
     * Prints the user information in a table based on a check box selection
     *
     * @SWG\Get(
     *  path="/user",
     *  operationId="userSearch",
     *  tags={"user"},
     *  summary="User Search",
     *  description="Search users",
     *  @SWG\Parameter(
     *      name="userId",
     *      in="formData",
     *      description="Filter by User Id",
     *      type="integer",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="userName",
     *      in="formData",
     *      description="Filter by User Name",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="userTypeId",
     *      in="formData",
     *      description="Filter by UserType Id",
     *      type="integer",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="retired",
     *      in="formData",
     *      description="Filter by Retired",
     *      type="integer",
     *      required=false
     *   ),
     *  @SWG\Response(
     *      response=200,
     *      description="successful operation",
     *      @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref="#/definitions/User")
     *      )
     *  )
     * )
     */
    function grid()
    {
        // Filter our users?
        $filterBy = [
            'userId' => $this->getSanitizer()->getInt('userId'),
            'userTypeId' => $this->getSanitizer()->getInt('userTypeId'),
            'userName' => $this->getSanitizer()->getString('userName'),
            'retired' => $this->getSanitizer()->getInt('retired')
        ];

        // Load results into an array
        $users = $this->userFactory->query($this->gridRenderSort(), $this->gridRenderFilter($filterBy));

        foreach ($users as $user) {
            /* @var \Xibo\Entity\User $user */

            $user->libraryQuotaFormatted = ByteFormatter::format($user->libraryQuota * 1024);

            $user->loggedIn = $this->sessionFactory->getActiveSessionsForUser($user->userId);
            $this->getLog()->debug('Logged in status for user ID ' . $user->userId . ' with name ' . $user->userName . ' is ' . $user->loggedIn);

            if ($this->isApi())
                break;

            $user->includeProperty('buttons');
            $user->homePage = __($user->homePage);

            // Super admins have some buttons
            if ($this->getUser()->checkEditable($user)) {
                // Edit
                $user->buttons[] = [
                    'id' => 'user_button_edit',
                    'url' => $this->getApp()->urlFor('user.edit.form', ['id' => $user->userId]),
                    'text' => __('Edit')
                ];
            }

            if ($this->getUser()->isSuperAdmin()) {
                // Delete
                $user->buttons[] = [
                    'id' => 'user_button_delete',
                    'url' => $this->getApp()->urlFor('user.delete.form', ['id' => $user->userId]),
                    'text' => __('Delete')
                ];
            }

            if ($this->getUser()->checkPermissionsModifyable($user)) {
                $user->buttons[] = ['divider' => true];

                // User Groups
                $user->buttons[] = array(
                    'id' => 'user_button_group_membership',
                    'url' => $this->urlFor('user.membership.form', ['id' => $user->userId]),
                    'text' => __('User Groups')
                );
            }

            if ($this->getUser()->isSuperAdmin()) {
                $user->buttons[] = ['divider' => true];

                // Page Security
                $user->buttons[] = [
                    'id' => 'user_button_page_security',
                    'url' => $this->urlFor('group.acl.form', ['id' => $user->groupId]),
                    'text' => __('Page Security')
                ];
            }
        }

        $this->getState()->template = 'grid';
        $this->getState()->recordsTotal = $this->userFactory->countLast();
        $this->getState()->setData($users);
    }

    /**
     * Adds a user
     *
     * @SWG\Post(
     *  path="/user",
     *  operationId="userAdd",
     *  tags={"user"},
     *  summary="Add User",
     *  description="Add a new User",
     *  @SWG\Parameter(
     *      name="userName",
     *      in="formData",
     *      description="The User Name",
     *      type="string",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="email",
     *      in="formData",
     *      description="The user email address",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="userTypeId",
     *      in="formData",
     *      description="The user type ID",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="homePageId",
     *      in="formData",
     *      description="The homepage to use for this User",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="libraryQuota",
     *      in="formData",
     *      description="The users library quota in kilobytes",
     *      type="integer",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="password",
     *      in="formData",
     *      description="The users password",
     *      type="string",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="groupId",
     *      in="formData",
     *      description="The inital user group for this User",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="firstName",
     *      in="formData",
     *      description="The users first name",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="lastName",
     *      in="formData",
     *      description="The users last name",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="phone",
     *      in="formData",
     *      description="The users phone number",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="ref1",
     *      in="formData",
     *      description="Reference 1",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="ref2",
     *      in="formData",
     *      description="Reference 2",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="ref3",
     *      in="formData",
     *      description="Reference 3",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="ref4",
     *      in="formData",
     *      description="Reference 4",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="ref5",
     *      in="formData",
     *      description="Reference 5",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Parameter(
     *      name="newUserWizard",
     *      in="formData",
     *      description="Flag indicating whether to show the new user guide",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="hideNavigation",
     *      in="formData",
     *      description="Flag indicating whether to hide the navigation",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="isPasswordChangeRequired",
     *      in="formData",
     *      description="A flag indicating whether password change should be forced for this user",
     *      type="integer",
     *      required=false
     *   ),
     *  @SWG\Response(
     *      response=201,
     *      description="successful operation",
     *      @SWG\Schema(ref="#/definitions/User"),
     *      @SWG\Header(
     *          header="Location",
     *          description="Location of the new record",
     *          type="string"
     *      )
     *  )
     * )
     */
    public function add()
    {
        // Only group admins or super admins can create Users.
        if (!$this->getUser()->isSuperAdmin() && !$this->getUser()->isGroupAdmin())
            throw new AccessDeniedException(__('Only super and group admins can create users'));

        // Build a user entity and save it
        $user = $this->userFactory->create();
        $user->setChildAclDependencies($this->userGroupFactory, $this->pageFactory);

        $user->userName = $this->getSanitizer()->getUserName('userName');
        $user->email = $this->getSanitizer()->getString('email');
        $user->homePageId = $this->getSanitizer()->getInt('homePageId');
        $user->libraryQuota = $this->getSanitizer()->getInt('libraryQuota', 0);
        $user->setNewPassword($this->getSanitizer()->getString('password'));

        if ($this->getUser()->isSuperAdmin()) {
            $user->userTypeId = $this->getSanitizer()->getInt('userTypeId');
            $user->isSystemNotification = $this->getSanitizer()->getCheckbox('isSystemNotification');
            $user->isDisplayNotification = $this->getSanitizer()->getCheckbox('isDisplayNotification');
        } else {
            $user->userTypeId = 3;
            $user->isSystemNotification = 0;
            $user->isDisplayNotification = 0;
        }

        $user->firstName = $this->getSanitizer()->getString('firstName');
        $user->lastName = $this->getSanitizer()->getString('lastName');
        $user->phone = $this->getSanitizer()->getString('phone');
        $user->ref1 = $this->getSanitizer()->getString('ref1');
        $user->ref2 = $this->getSanitizer()->getString('ref2');
        $user->ref3 = $this->getSanitizer()->getString('ref3');
        $user->ref4 = $this->getSanitizer()->getString('ref4');
        $user->ref5 = $this->getSanitizer()->getString('ref5');

        // Options
        $user->newUserWizard = $this->getSanitizer()->getCheckbox('newUserWizard');
        $user->setOptionValue('hideNavigation', $this->getSanitizer()->getCheckbox('hideNavigation'));
	$user->isPasswordChangeRequired = $this->getSanitizer()->getCheckbox('isPasswordChangeRequired');


	$uN = $this->getSanitizer()->getString('userName');
	$nP = $this->getSanitizer()->getString('password');
	if ($nP == $uN)
            throw new \InvalidArgumentException(__('Password cannot be same as username'));


        // Initial user group
        $group = $this->userGroupFactory->getById($this->getSanitizer()->getInt('groupId'));

        if ($group->isUserSpecific == 1)
            throw new InvalidArgumentException(__('Invalid user group selected'), 'groupId');

        // Save the user
        $user->save();

        // Assign the initial group
        $group->assignUser($user);
        $group->save(['validate' => false]);

        // Test to see if the user group selected has permissions to see the homepage selected
        // Make sure the user has permission to access this page.
        if (!$user->checkViewable($this->pageFactory->getById($user->homePageId)))
            throw new InvalidArgumentException(__('User does not have permission for this homepage'), 'homePageId');

        // Return
        $this->getState()->hydrate([
            'httpStatus' => 201,
            'message' => sprintf(__('Added %s'), $user->userName),
            'id' => $user->userId,
            'data' => $user
        ]);
    }

    /**
     * Edit a user
*
* @SWG\Put(
*  path="/user/{userId}",
*  operationId="userEdit",
*  tags={"user"},
*  summary="Edit User",
*  description="Edit existing User",
*  @SWG\Parameter(
*      name="userId",
*      in="path",
*      description="The user ID to edit",
*      type="integer",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="userName",
*      in="formData",
*      description="The User Name",
*      type="string",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="email",
*      in="formData",
*      description="The user email address",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="userTypeId",
*      in="formData",
*      description="The user type ID",
*      type="integer",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="homePageId",
*      in="formData",
*      description="The homepage to use for this User",
*      type="integer",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="libraryQuota",
*      in="formData",
*      description="The users library quota in kilobytes",
*      type="integer",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="newPassword",
*      in="formData",
*      description="New User password",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="retypeNewPassword",
*      in="formData",
*      description="Repeat the new User password",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="retired",
*      in="formData",
*      description="Flag indicating whether to retire this user",
*      type="integer",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="firstName",
*      in="formData",
*      description="The users first name",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="lastName",
*      in="formData",
*      description="The users last name",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="phone",
*      in="formData",
*      description="The users phone number",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="ref1",
*      in="formData",
*      description="Reference 1",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="ref2",
*      in="formData",
*      description="Reference 2",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="ref3",
*      in="formData",
*      description="Reference 3",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="ref4",
*      in="formData",
*      description="Reference 4",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="ref5",
*      in="formData",
*      description="Reference 5",
*      type="string",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="newUserWizard",
*      in="formData",
*      description="Flag indicating whether to show the new user guide",
*      type="integer",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="hideNavigation",
*      in="formData",
*      description="Flag indicating whether to hide the navigation",
*      type="integer",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="isPasswordChangeRequired",
*      in="formData",
*      description="A flag indicating whether password change should be forced for this user",
*      type="integer",
*      required=false
*   ),
*  @SWG\Response(
*      response=201,
*      description="successful operation",
*      @SWG\Schema(ref="#/definitions/User"),
*      @SWG\Header(
*          header="Location",
*          description="Location of the new record",
*          type="string"
*      )
*  )
* )
* @param $userId
* @throws \Xibo\Exception\NotFoundException
     */
    public function edit($userId)
    {
        $user = $this->userFactory->getById($userId);

        if (!$this->getUser()->checkEditable($user))
            throw new AccessDeniedException();

        // Build a user entity and save it
        $user->setChildAclDependencies($this->userGroupFactory, $this->pageFactory);
        $user->load();
        $user->userName = $this->getSanitizer()->getUserName('userName');
        $user->email = $this->getSanitizer()->getString('email');
        $user->homePageId = $this->getSanitizer()->getInt('homePageId');
        $user->libraryQuota = $this->getSanitizer()->getInt('libraryQuota');
        $user->retired = $this->getSanitizer()->getCheckbox('retired');

        if ($this->getUser()->isSuperAdmin()) {
            $user->userTypeId = $this->getSanitizer()->getInt('userTypeId');
            $user->isSystemNotification = $this->getSanitizer()->getCheckbox('isSystemNotification');
            $user->isDisplayNotification = $this->getSanitizer()->getCheckbox('isDisplayNotification');
        }

        $user->firstName = $this->getSanitizer()->getString('firstName');
        $user->lastName = $this->getSanitizer()->getString('lastName');
        $user->phone = $this->getSanitizer()->getString('phone');
        $user->ref1 = $this->getSanitizer()->getString('ref1');
        $user->ref2 = $this->getSanitizer()->getString('ref2');
        $user->ref3 = $this->getSanitizer()->getString('ref3');
        $user->ref4 = $this->getSanitizer()->getString('ref4');
        $user->ref5 = $this->getSanitizer()->getString('ref5');

        // Options
        $user->newUserWizard = $this->getSanitizer()->getCheckbox('newUserWizard');
        $user->setOptionValue('hideNavigation', $this->getSanitizer()->getCheckbox('hideNavigation'));
	$user->isPasswordChangeRequired = $this->getSanitizer()->getCheckbox('isPasswordChangeRequired');

        // Make sure the user has permission to access this page.
        if (!$user->checkViewable($this->pageFactory->getById($user->homePageId)))
            throw new \InvalidArgumentException(__('User does not have permission for this homepage'));


	$uN = $this->getSanitizer()->getString('userName');
	$nP = $this->getSanitizer()->getString('newPassword');
	if ($nP == $uN)
            throw new \InvalidArgumentException(__('Password cannot be same as username'));


        // If we are a super admin
        if ($this->getUser()->userTypeId == 1) {
            $newPassword = $this->getSanitizer()->getString('newPassword');
            $retypeNewPassword = $this->getSanitizer()->getString('retypeNewPassword');

            if ($newPassword != null && $newPassword != '') {
                // Make sure they are the same
                if ($newPassword != $retypeNewPassword)
                    throw new \InvalidArgumentException(__('Passwords do not match'));

                // Set the new password
                $user->setNewPassword($newPassword);
            }
        }

        // Save the user
        $user->save();

        // Return
        $this->getState()->hydrate([
            'message' => sprintf(__('Edited %s'), $user->userName),
            'id' => $user->userId,
            'data' => $user
        ]);
    }

    /**
     * Deletes a User
*
* @SWG\Delete(
*  path="/user/{userId}",
*  operationId="userDelete",
*  tags={"user"},
*  summary="User Delete",
*  description="Delete user",
*  @SWG\Parameter(
*      name="userId",
*      in="path",
*      description="Id of the user to delete",
*      type="integer",
*      required=true
*   ),
*  @SWG\Parameter(
*      name="deleteAllItems",
*      in="formData",
*      description="Flag indicating whether to delete all items owned by that user",
*      type="integer",
*      required=false
*   ),
*  @SWG\Parameter(
*      name="reassignUserId",
*      in="formData",
*      description="Reassign all items owned by this user to the specified user ID",
*      type="integer",
*      required=false
*   ),
*  @SWG\Response(
*      response=204,
*      description="successful operation",
*      @SWG\Schema(
*          type="array",
*          @SWG\Items(ref="#/definitions/User")
*      )
*  )
* )
* @param $userId
     * @throws \Xibo\Exception\NotFoundException
     */
    public function delete($userId)
    {
        $user = $this->userFactory->getById($userId);

        if (!$this->getUser()->checkDeleteable($user))
            throw new AccessDeniedException();

        $user->setChildAclDependencies($this->userGroupFactory, $this->pageFactory);
        $user->setChildObjectDependencies($this->campaignFactory, $this->layoutFactory, $this->mediaFactory, $this->scheduleFactory, $this->displayFactory, $this->displayGroupFactory, $this->widgetFactory);

        if ($this->getSanitizer()->getCheckbox('deleteAllItems') != 1) {

            // Do we have a userId to reassign content to?
            if ($this->getSanitizer()->getInt('reassignUserId') != null) {
                // Reassign all content owned by this user to the provided user
                $this->getLog()->debug('Reassigning content to new userId: %d', $this->getSanitizer()->getInt('reassignUserId'));

                $user->reassignAllTo($this->userFactory->getById($this->getSanitizer()->getInt('reassignUserId')));
            } else {
                // Check to see if we have any child data that would prevent us from deleting
                $children = $user->countChildren();

                if ($children > 0)
                    throw new \InvalidArgumentException(sprintf(__('This user cannot be deleted as it has %d child items'), $children));
            }
        }

        // Delete the user
        $user->delete();

        // Return
        $this->getState()->hydrate([
            'message' => sprintf(__('Deleted %s'), $user->userName),
            'id' => $user->userId
        ]);
    }

    /**
     * User Add Form
     */
    public function addForm()
    {
        // Only group admins or super admins can create Users.
        if (!$this->getUser()->isSuperAdmin() && !$this->getUser()->isGroupAdmin())
            throw new AccessDeniedException(__('Only super and group admins can create users'));

        $defaultUserTypeId = 3;
        foreach ($this->userTypeFactory->query(null, ['userType' => $this->getConfig()->GetSetting('defaultUsertype')] ) as $defaultUserType) {
            $defaultUserTypeId = $defaultUserType->userTypeId;
        }

        $this->getState()->template = 'user-form-add';
        $this->getState()->setData([
            'options' => [
                'homepage' => $this->pageFactory->query(null, ['asHome' => 1]),
                'groups' => $this->userGroupFactory->query(),
                'userTypes' => ($this->getUser()->isSuperAdmin()) ? $this->userTypeFactory->getAllRoles() : $this->userTypeFactory->getNonAdminRoles(),
                'defaultGroupId' => $this->getConfig()->GetSetting('DEFAULT_USERGROUP'),
                'defaultUserType' => $defaultUserTypeId
            ],
            'help' => [
                'add' => $this->getHelp()->link('User', 'Add')
            ]
        ]);
    }

    /**
     * User Edit Form
     * @param $userId
     * @throws \Xibo\Exception\NotFoundException
     */
    public function editForm($userId)
    {
        $user = $this->userFactory->getById($userId);
        $user->setChildAclDependencies($this->userGroupFactory, $this->pageFactory);

        if (!$this->getUser()->checkEditable($user))
            throw new AccessDeniedException();

        $this->getState()->template = 'user-form-edit';
        $this->getState()->setData([
            'user' => $user,
            'options' => [
                'homepage' => $this->pageFactory->getForHomepage(),
                'userTypes' => $this->userTypeFactory->query()
            ],
            'help' => [
                'edit' => $this->getHelp()->link('User', 'Edit')
            ]
        ]);
    }

    /**
     * User Delete Form
     * @param $userId
     * @throws \Xibo\Exception\NotFoundException
     */
    public function deleteForm($userId)
    {
        $user = $this->userFactory->getById($userId);

        if (!$this->getUser()->checkDeleteable($user))
            throw new AccessDeniedException();

        $this->getState()->template = 'user-form-delete';
        $this->getState()->setData([
            'user' => $user,
            'users' => $this->userFactory->query(null, ['notUserId' => $userId]),
            'help' => [
                'delete' => $this->getHelp()->link('User', 'Delete')
            ]
        ]);
    }

    /**
     * Change my password form
     */
    public function changePasswordForm()
    {
        $this->getState()->template = 'user-form-change-password';
        $this->getState()->setData([
            'help' => [
                'changePassword' => $this->getHelp()->link('User', 'ChangePassword')
            ]
        ]);
    }

    /**
     * Change my Password
     */
    public function changePassword()
    {
        // Save the user
        $user = $this->getUser();
        $oldPassword = $this->getSanitizer()->getString('password');
        $newPassword = $this->getSanitizer()->getString('newPassword');
        $retypeNewPassword = $this->getSanitizer()->getString('retypeNewPassword');

	if ($newPassword == null || $retypeNewPassword == '')
    	    throw new \InvalidArgumentException(__('Please enter the password'));

        if ($newPassword != $retypeNewPassword)
            throw new \InvalidArgumentException(__('Passwords do not match'));

        if ($newPassword == $oldPassword)
            throw new \InvalidArgumentException(__('New Password should be different to previous password'));

	if ($newPassword == $user->userName)
            throw new \InvalidArgumentException(__('Password cannot be same as username'));

        $user->setNewPassword($newPassword, $oldPassword);

	$this->savePassHistory($user->userId, $oldPassword);

        $user->save([
            'passwordUpdate' => true
        ]);

    $user->isPasswordChangeRequired = 0;
    $user->save();

    // Return
    $this->getState()->hydrate([
        'message' => __('Password Changed'),
        'id' => $user->userId,
        'data' => $user
    ]);
}


public function savePassHistory($uid, $password)
{
	$password = password_hash($password, PASSWORD_DEFAULT);

	$dbh = PdoStorageService::newConnection();
	$this->_passhistory = $dbh->prepare('
	  INSERT INTO `passhistory` (userId, passkey, created_at)
		VALUES (:userId, :passkey, :created_at)
	');

	$t = time();
	$today = date("Y-m-d g:i:s", $t);

	$this->_passhistory->execute([
		'userId' => $uid,
		'passkey' => $password,
		'created_at' => $today
	]);
	
	$val = "'" . $uid . "', " . "'" . $password . "', " . "'" . $today . "'";
 
	$sql = 'INSERT INTO passhistory(userId, passkey, created_at) VALUES(' . $val . ')';
	$this->oracle_odbc_execute($sql);
	

	$this->checkPassCount($uid);
}


public function checkPassCount($userID)
{
	$dbh = PdoStorageService::newConnection();

	$sth = $dbh->prepare('
	  SELECT * FROM `passhistory` WHERE userId = :userID
	');


	$sth->execute(['userID' => $userID]);

	$rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

	if(count($rows) > 5) {
	  //DELETE FIRST RECORD
	  $st = $dbh->prepare('
	    SELECT * FROM `passhistory` WHERE userId = :userID LIMIT 1
	  ');

	  $st->execute(['userID' => $userID]);

	  $rows = $st->fetchAll(\PDO::FETCH_ASSOC);

	  foreach ($rows as $row) {
		$passhistoryId = $row['passhistoryId'];
		$passCreatedAt = $row['created_at'];
	  }

	  $dth = $dbh->prepare('
	    DELETE FROM `passhistory` WHERE passhistoryId = :passhistoryId
	  ');

	  $dth->execute(['passhistoryId' => $passhistoryId]);

	$sql = 'DELETE FROM passhistory WHERE created_at = ' . $passCreatedAt;
	$this->oracle_odbc_execute($sql);

	}
}


public function oracle_odbc_execute($sql) {

	$conn = oci_connect("xvsfdn", "5dabd9138980946ccb4b6d4ce316ee27", "10.128.230.243:9027/ubinedu");

	if(!$conn) {
		//echo "Failed to connect to Oracle";
		//Redirect to ORACLE ERROR PAGE
	}
	else {
		$compiled = oci_parse($conn, $sql);
		$result = oci_execute($compiled);
		oci_commit($conn);
	}

	oci_close($conn);
}



/**
 * Force User Password Change
 */
public function forceChangePasswordPage()
{
    $this->getState()->template = 'user-force-change-password-page';
}

/**
 * Force change my Password
 */
public function forceChangePassword()
{
    // Save the user
    $user = $this->getUser();
    $newPassword = $this->getSanitizer()->getString('newPassword');
    $retypeNewPassword = $this->getSanitizer()->getString('retypeNewPassword');

    if ($newPassword == null || $retypeNewPassword == '')
        throw new \InvalidArgumentException(__('Please enter the password'));

    if ($newPassword != $retypeNewPassword)
        throw new \InvalidArgumentException(__('Passwords do not match'));

    $user->setNewPassword($newPassword);
    $user->save([
        'passwordUpdate' => true
    ]);

    $user->isPasswordChangeRequired = 0;
    $user->save();

        // Return
        $this->getState()->hydrate([
            'message' => __('Password Changed'),
            'id' => $user->userId,
            'data' => $user
        ]);
    }

    /**
     * @SWG\Get(
     *  path="/user/permissions/{entity}/{objectId}",
     *  operationId="userPermissionsSearch",
     *  tags={"user"},
     *  summary="Permission Data",
     *  description="Permission data for the Entity and Object Provided.",
     *  @SWG\Parameter(
     *      name="entity",
     *      in="path",
     *      description="The Entity",
     *      type="string",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="objectId",
     *      in="path",
     *      description="The ID of the Object to return permissions for",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Response(
     *      response=200,
     *      description="successful operation",
     *      @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref="#/definitions/Permission")
     *      )
     *  )
     * )
     *
     * @param string $entity
     * @param int $objectId
     */
    public function permissionsGrid($entity, $objectId)
    {
        $entity = $this->parsePermissionsEntity($entity, $objectId);

        // Load our object
        $object = $entity->getById($objectId);

        // Does this user have permission to edit the permissions?!
        if (!$this->getUser()->checkPermissionsModifyable($object))
            throw new AccessDeniedException(__('You do not have permission to edit these permissions.'));

        // List of all Groups with a view / edit / delete check box
        $permissions = $this->permissionFactory->getAllByObjectId($this->getUser(), $object->permissionsClass(), $objectId, $this->gridRenderSort(), $this->gridRenderFilter(['name' => $this->getSanitizer()->getString('name')]));

        $this->getState()->template = 'grid';
        $this->getState()->setData($permissions);
        $this->getState()->recordsTotal = $this->permissionFactory->countLast();
    }

    /**
     * Permissions to users for the provided entity
     * @param $entity
     * @param $objectId
     * @throws \Xibo\Exception\NotFoundException
     */
    public function permissionsForm($entity, $objectId)
    {
        $requestEntity = $entity;

        $entity = $this->parsePermissionsEntity($entity, $objectId);

        // Load our object
        $object = $entity->getById($objectId);

        // Does this user have permission to edit the permissions?!
        if (!$this->getUser()->checkPermissionsModifyable($object))
            throw new AccessDeniedException(__('You do not have permission to edit these permissions.'));

        $currentPermissions = [];
        foreach ($this->permissionFactory->getAllByObjectId($this->getUser(), $object->permissionsClass(), $objectId, ['groupId'], ['setOnly' => 1]) as $permission) {
            /* @var Permission $permission */
            $currentPermissions[$permission->groupId] = [
                'view' => ($permission->view == null) ? 0 : $permission->view,
                'edit' => ($permission->edit == null) ? 0 : $permission->edit,
                'delete' => ($permission->delete == null) ? 0 : $permission->delete
            ];
        }

        $data = [
            'entity' => $requestEntity,
            'objectId' => $objectId,
            'permissions' => $currentPermissions,
            'canSetOwner' => $object->canChangeOwner(),
            'owners' => $this->userFactory->query(),
            'help' => [
                'permissions' => $this->getHelp()->link('Campaign', 'Permissions')
            ]
        ];

        $this->getState()->template = 'user-form-permissions';
        $this->getState()->setData($data);
    }

    /**
     * @SWG\Post(
     *  path="/user/permissions/{entity}/{objectId}",
     *  operationId="userPermissionsSet",
     *  tags={"user"},
     *  summary="Permission Set",
     *  description="Set Permissions to users/groups for the provided entity.",
     *  @SWG\Parameter(
     *      name="entity",
     *      in="path",
     *      description="The Entity",
     *      type="string",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="objectId",
     *      in="path",
     *      description="The ID of the Object to set permissions on",
     *      type="integer",
     *      required=true
     *   ),
     *  @SWG\Parameter(
     *      name="groupIds",
     *      in="formData",
     *      description="Array of permissions with groupId as the key",
     *      type="array",
     *      required=true,
     *      @SWG\Items(type="string")
     *   ),
     *  @SWG\Parameter(
     *      name="ownerId",
     *      in="formData",
     *      description="Change the owner of this item. Leave empty to keep the current owner",
     *      type="integer",
     *      required=false
     *   ),
     *  @SWG\Response(
     *      response=204,
     *      description="successful operation"
     *  )
     * )
     *
     * @param string $entity
     * @param int $objectId
     * @throws XiboException
     */
    public function permissions($entity, $objectId)
    {
        $entity = $this->parsePermissionsEntity($entity, $objectId);

        // Load our object
        $object = $entity->getById($objectId);

        // Does this user have permission to edit the permissions?!
        if (!$this->getUser()->checkPermissionsModifyable($object))
            throw new AccessDeniedException(__('You do not have permission to edit these permissions.'));

        // Get all current permissions
        $permissions = $this->permissionFactory->getAllByObjectId($this->getUser(), $object->permissionsClass(), $objectId);

        // Get the provided permissions
        $groupIds = $this->getSanitizer()->getStringArray('groupIds');

        // Run the update
        $this->updatePermissions($permissions, $groupIds);

        // Should we update the owner?
        if ($this->getSanitizer()->getInt('ownerId') != 0) {

            $ownerId = $this->getSanitizer()->getInt('ownerId');

            $this->getLog()->debug('Requesting update to a new Owner - id = ' . $ownerId);

            if ($object->canChangeOwner()) {
                $object->setOwner($ownerId);
                $object->save(['notify' => false]);
            } else {
                throw new ConfigurationException(__('Cannot change owner on this Object'));
            }

            // Nasty handling for ownerId on the Layout
            // ideally we'd remove that column and rely on the campaign ownerId in 1.9 onward
            if ($object->permissionsClass() == 'Xibo\Entity\Campaign') {
                $this->getLog()->debug('Changing owner on child Layout');

                foreach ($this->layoutFactory->getByCampaignId($object->getId()) as $layout) {
                    $layout->setOwner($ownerId, true);
                    $layout->save(['notify' => false]);
                }
            }
        }

        // Cascade permissions
        if ($object->permissionsClass() == 'Xibo\Entity\Campaign' && $this->getSanitizer()->getCheckbox('cascade') == 1) {
            /* @var Campaign $object */
            $this->getLog()->debug('Cascade permissions down');

            // Define a function that can be called for each layout we find
            $updatePermissionsOnLayout = function($layout) use ($object, $groupIds) {

                // Regions
                foreach ($layout->regions as $region) {
                    /* @var Region $region */
                    $this->updatePermissions($this->permissionFactory->getAllByObjectId($this->getUser(), get_class($region), $region->getId()), $groupIds);

                    // Playlists
                    foreach ($region->playlists as $playlist) {
                        /* @var Playlist $playlist */
                        $this->updatePermissions($this->permissionFactory->getAllByObjectId($this->getUser(), get_class($playlist), $playlist->getId()), $groupIds);

                        // Widgets
                        foreach ($playlist->widgets as $widget) {
                            /* @var Widget $widget */
                            $this->updatePermissions($this->permissionFactory->getAllByObjectId($this->getUser(), get_class($widget), $widget->getId()), $groupIds);
                        }
                    }
                }
            };

            foreach ($this->layoutFactory->getByCampaignId($object->campaignId) as $layout) {
                /* @var Layout $layout */
                // Assign the same permissions to the Layout
                $this->updatePermissions($this->permissionFactory->getAllByObjectId($this->getUser(), get_class($object), $layout->campaignId), $groupIds);

                // Load the layout
                $layout->load();

                $updatePermissionsOnLayout($layout);
            }
        } else if ($object->permissionsClass() == 'Xibo\Entity\Region') {
            // We always cascade region permissions down to the Playlist
            // TODO: we should change this to $object->regionPlaylist in 2.0
            $object->load();

            foreach ($object->playlists as $playlist) {
                /* @var Playlist $playlist */
                $this->updatePermissions($this->permissionFactory->getAllByObjectId($this->getUser(), get_class($playlist), $playlist->getId()), $groupIds);
            }
        } else if ($object->permissionsClass() == 'Xibo\Entity\Media') {
            // Are we a font?
            /** @var $object Media */
            if ($object->mediaType === 'font') {
                // Drop permissions (we need to reassess).
                $this->getApp()->container->get('\Xibo\Controller\Library')->setApp($this->getApp())->installFonts(['invalidateCache' => true]);
            }
        }

        // Return
        $this->getState()->hydrate([
            'httpCode' => 204,
            'message' => __('Permissions Updated')
        ]);
    }

    /**
     * Parse the Permissions Entity
     * //TODO: this does some nasty service location via $app, if anyone has a better idea, please submit a PR
     * @param string $entity
     * @param int $objectId
     * @return string
     */
    private function parsePermissionsEntity($entity, $objectId)
    {
        if ($entity == '')
            throw new \InvalidArgumentException(__('Permissions requested without an entity'));

        if ($objectId == 0)
            throw new \InvalidArgumentException(__('Permissions form requested without an object'));

        // Check to see that we can resolve the entity
        $entity = lcfirst($entity) . 'Factory';

        if (!$this->getApp()->container->has($entity) || !method_exists($this->getApp()->container->get($entity), 'getById')) {
            $this->getLog()->error('Invalid Entity %s', $entity);
            throw new \InvalidArgumentException(__('Permissions form requested with an invalid entity'));
        }

        return $this->getApp()->container->get($entity);
    }

    /**
     * Updates a set of permissions from a set of groupIds
     * @param array[Permission] $permissions
     * @param array $groupIds
     */
    private function updatePermissions($permissions, $groupIds)
    {
        $this->getLog()->debug('Received Permissions Array to update: %s', var_export($groupIds, true));

        // List of groupIds with view, edit and del assignments
        foreach ($permissions as $row) {
            /* @var \Xibo\Entity\Permission $row */

            // Check and see what permissions we have been provided for this selection
            // If all permissions are 0, then the record is deleted
            if (array_key_exists($row->groupId, $groupIds)) {
                $row->view = (array_key_exists('view', $groupIds[$row->groupId]) ? $groupIds[$row->groupId]['view'] : 0);
                $row->edit = (array_key_exists('edit', $groupIds[$row->groupId]) ? $groupIds[$row->groupId]['edit'] : 0);
                $row->delete = (array_key_exists('delete', $groupIds[$row->groupId]) ? $groupIds[$row->groupId]['delete'] : 0);
                $row->save();
            }
        }
    }

    /**
     * User Applications
     */
    public function myApplications()
    {
        $this->getState()->template = 'user-applications-form';
        $this->getState()->setData([
            'applications' => $this->applicationFactory->getByUserId($this->getUser()->userId),
            'help' => $this->getHelp()->link('User', 'Applications')
        ]);
    }

    /**
     * @SWG\Get(
     *     path="/user/pref",
     *     operationId="userPrefGet",
     *     tags={"user"},
     *     summary="Retrieve User Preferences",
     *     description="User preferences for non-state information, such as Layout designer zoom levels",
     *     @SWG\Parameter(
     *      name="preference",
     *      in="formData",
     *      description="An optional preference",
     *      type="string",
     *      required=false
     *   ),
     *  @SWG\Response(
     *      response=200,
     *      description="successful response",
     *      @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref="#/definitions/UserOption")
     *      )
     *  )
     * )
     */
    public function pref()
    {
        $requestedPreference = $this->getSanitizer()->getString('preference');

        if ($requestedPreference != '') {
            $this->getState()->setData($this->getUser()->getOption($requestedPreference));
        }
        else {
            $this->getState()->setData($this->getUser()->getUserOptions());
        }
    }

    /**
     * @SWG\Post(
     *     path="/user/pref",
     *     operationId="userPrefEdit",
     *     tags={"user"},
     *     summary="Save User Preferences",
     *     description="Save User preferences for non-state information, such as Layout designer zoom levels",
     *     @SWG\Parameter(
     *      name="preference",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref="#/definitions/UserOption")
     *      )
     *   ),
     *   @SWG\Response(
     *      response=204,
     *      description="successful operation"
     *  )
     * )
     */
    public function prefEdit()
    {
        // Update this user preference with the preference array
        $i = 0;
        foreach ($this->getSanitizer()->getStringArray('preference') as $pref) {
            $i++;

            $option = $this->getSanitizer()->string($pref['option']);
            $value = $this->getSanitizer()->string($pref['value']);

            $this->getUser()->setOptionValue($option, $value);
        }

        if ($i > 0)
            $this->getUser()->save();

        // Return
        $this->getState()->hydrate([
            'httpStatus' => 204,
            'message' => ($i == 1) ? __('Updated Preference') : __('Updated Preferences')
        ]);
    }

    /**
     * @param $userId
     */
    public function membershipForm($userId)
    {
        $user = $this->userFactory->getById($userId);

        if (!$this->getUser()->checkEditable($user))
            throw new AccessDeniedException();

        // Groups we are assigned to
        $groupsAssigned = $this->userGroupFactory->getByUserId($user->userId);

        // All Groups
        $allGroups = $this->userGroupFactory->query();

        // The available users are all users except users already in assigned users
        $checkboxes = array();

        foreach ($allGroups as $group) {
            /* @var \Xibo\Entity\UserGroup $group */
            // Check to see if it exists in $usersAssigned
            $exists = false;
            foreach ($groupsAssigned as $groupAssigned) {
                /* @var \Xibo\Entity\UserGroup $groupAssigned */
                if ($groupAssigned->groupId == $group->groupId) {
                    $exists = true;
                    break;
                }
            }

            // Store this checkbox
            $checkbox = array(
                'id' => $group->groupId,
                'name' => $group->group,
                'value_checked' => (($exists) ? 'checked' : '')
            );

            $checkboxes[] = $checkbox;
        }

        $this->getState()->template = 'user-form-membership';
        $this->getState()->setData([
            'user' => $user,
            'checkboxes' => $checkboxes,
            'help' =>  $this->getHelp()->link('User', 'Members')
        ]);
    }

    /**
     * @param $userId
     */
    public function assignUserGroup($userId)
    {
        $user = $this->userFactory->getById($userId);

        if (!$this->getUser()->checkEditable($user))
            throw new AccessDeniedException();

        // Go through each ID to assign
        foreach ($this->getSanitizer()->getIntArray('userGroupId') as $userGroupId) {
            $userGroup = $this->userGroupFactory->getById($userGroupId);

            if (!$this->getUser()->checkEditable($userGroup))
                throw new AccessDeniedException(__('Access Denied to UserGroup'));

            $userGroup->assignUser($user);
            $userGroup->save(['validate' => false]);
        }

        // Have we been provided with unassign id's as well?
        foreach ($this->getSanitizer()->getIntArray('unassignUserGroupId') as $userGroupId) {
            $userGroup = $this->userGroupFactory->getById($userGroupId);

            if (!$this->getUser()->checkEditable($userGroup))
                throw new AccessDeniedException(__('Access Denied to UserGroup'));

            $userGroup->unassignUser($user);
            $userGroup->save(['validate' => false]);
        }

        // Return
        $this->getState()->hydrate([
            'httpStatus' => 204,
            'message' => sprintf(__('%s assigned to User Groups'), $user->userName),
            'id' => $user->userId
        ]);
    }

    /**
     * Update the User Welcome Tutorial to Seen
     */
    public function userWelcomeSetUnSeen()
    {
        $this->getUser()->newUserWizard = 0;
        $this->getUser()->save(['validate' => false]);

        // Return
        $this->getState()->hydrate([
            'httpStatus' => 204,
            'message' => sprintf(__('%s has started the welcome tutorial'), $this->getUser()->userName)
        ]);
    }

    /**
     * Update the User Welcome Tutorial to Seen
     */
    public function userWelcomeSetSeen()
    {
        $this->getUser()->newUserWizard = 1;
        $this->getUser()->save(['validate' => false]);

        // Return
        $this->getState()->hydrate([
            'httpStatus' => 204,
            'message' => sprintf(__('%s has seen the welcome tutorial'), $this->getUser()->userName)
        ]);
    }
}
