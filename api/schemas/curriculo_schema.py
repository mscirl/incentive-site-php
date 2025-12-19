from database.db import ma
from models.curriculo import Curriculo

class CurriculoSchema(ma.SQLAlchemySchema):
    class Meta:
        model = Curriculo

    id = ma.auto_field(dump_only=True)
    nome = ma.Str(required=True)
    cv_link = ma.Str()

curriculo_schema = CurriculoSchema()
curriculos_schema = CurriculoSchema(many=True)
