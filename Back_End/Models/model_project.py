from tortoise.models import Model
from tortoise import fields
from .model_user import User_Manager

class Project_Manager(Model):
    id = fields.IntField(primary_key = True)
    name = fields.CharField(max_length = 60)
    description = fields.TextField()
    status = fields.TextField()
    created_at = fields.DatetimeField(auto_now_add = True)
    image_link = fields.TextField(null=True)
    
    user: fields.ForeignKeyRelation[User_Manager] = fields.ForeignKeyField (
        "models.User_Manager", related_name= "projects"
    )
    
    def __str__(self):
        return self.description, self.status, self.image_link

    