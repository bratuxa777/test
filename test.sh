#!/bin/bash

# Настройки подключения к базе данных
HOST='10.8.98.51'
DBNAME='db_magnit_ru'
USER='magnitru'
PASS='ami@Touv2Poh'

# Файл для записи
OUTPUT_FILE='tables_list.txt'

# Выполнение запроса для получения списка таблиц и запись в файл
mysql -h "$HOST" -u "$USER" -p"$PASS" -D "$DBNAME" -e 'SHOW TABLES' > "$OUTPUT_FILE"

# Проверка успешности выполнения
if [[ $? -eq 0 ]]; then
    echo "Названия таблиц успешно записаны в файл '$OUTPUT_FILE'."
else
    echo "Ошибка выполнения запроса или записи в файл."
fi
