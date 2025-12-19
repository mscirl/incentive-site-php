from flask import Flask, jsonify, request
from flask_cors import CORS
from database.db import db, ma
from models.curriculo import Curriculo
from schemas.curriculo_schema import curriculo_schema, curriculos_schema
import os

app = Flask(__name__)
CORS(app)

basedir = os.path.abspath(os.path.dirname(__file__))
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///' + os.path.join(basedir, 'curriculos.db')
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db.init_app(app)
ma.init_app(app)

@app.route("/")
def home():
    return jsonify({"mensagem": "API de Currículos Lattes está no ar"}), 200

@app.route("/curriculos", methods=["GET"])
def get_curriculos():
    todos = Curriculo.query.all()
    return curriculos_schema.jsonify(todos), 200

@app.route("/curriculos/<int:id>", methods=["GET"])
def get_curriculo(id):
    curriculo = Curriculo.query.get(id)
    if not curriculo:
        return jsonify({"erro": "Currículo não encontrado"}), 404
    return curriculo_schema.jsonify(curriculo), 200

@app.route("/curriculos", methods=["POST"])
def add_curriculo():
    json_data = request.get_json()
    if not json_data:
        return jsonify({"erro": "Requisição sem corpo JSON"}), 400

    errors = curriculo_schema.validate(json_data)
    if errors:
        return jsonify(errors), 400

    novo = Curriculo(nome=json_data['nome'], cv_link=json_data.get('cv_link'))
    db.session.add(novo)
    db.session.commit()
    return curriculo_schema.jsonify(novo), 201

@app.route("/curriculos/<int:id>", methods=["PUT"])
def update_curriculo(id):
    curriculo = Curriculo.query.get(id)
    if not curriculo:
        return jsonify({"erro": "Currículo não encontrado"}), 404

    json_data = request.get_json()
    if not json_data:
        return jsonify({"erro": "Requisição sem corpo JSON"}), 400

    errors = curriculo_schema.validate(json_data, partial=True)
    if errors:
        return jsonify(errors), 400

    curriculo.nome = json_data.get('nome', curriculo.nome)
    curriculo.cv_link = json_data.get('cv_link', curriculo.cv_link)
    db.session.commit()
    return curriculo_schema.jsonify(curriculo), 200

@app.route("/curriculos/<int:id>", methods=["DELETE"])
def delete_curriculo(id):
    curriculo = Curriculo.query.get(id)
    if not curriculo:
        return jsonify({"erro": "Currículo não encontrado"}), 404

    db.session.delete(curriculo)
    db.session.commit()
    return jsonify({"mensagem": f"Currículo com ID {id} removido"}), 200

if __name__ == "__main__":
    with app.app_context():
        db.create_all()
    app.run(host="127.0.0.1", port=5001, debug=True)
