#!/bin/sh
/opt/lampp/bin/mysqldump -uroot -pgm95ku ubi_ds > data/compiler_001.sql
rm -R data/compiler_001.zip
zip -r data/compiler_001.zip data/compiler_001.sql
rm -R data/compiler_001.sql
echo "Export Successful" > log_temp.txt
echo `date` >> log_temp.txt
echo " " >> log_temp.txt
cat log_temp.txt >> log_file.txt
