#!/bin/bash
echo "Instalando dependências..."
pip install -r requirements.txt
echo "Iniciando a API..."
export FLASK_APP=app.py
export FLASK_ENV=development
python app.py
