from flask import jsonify

def error_not_found ():
    return jsonify({"erro": "Currículo não encontrado"}), 404

