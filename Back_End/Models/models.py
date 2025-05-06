from tortoise.models import Model
from tortoise import fields

class Project(Model):
    __tablename__ = "projects"
    id = fields.IntField(primary_key = True)
    name = fields.CharField(max_length = 60)
    description = fields.TextField()
    status = fields.TextField()  # Ex: ativo, pausado, finalizado
    created_at = fields.DatetimeField(auto_now = True)
    