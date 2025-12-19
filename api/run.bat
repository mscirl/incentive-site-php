@echo off
echo Instalando dependências...
pip install -r requirements.txt
echo Iniciando a API...
set FLASK_APP=app.py
set FLASK_ENV=development
python app.py
pause
