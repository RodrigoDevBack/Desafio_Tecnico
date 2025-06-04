from tortoise.models import Model
from tortoise import fields


class User_Manager(Model):
    id_user = fields.IntField(primary_key=True)
    name_user = fields.TextField()
    user_hash_password = fields.TextField()
    
    projects: fields.ReverseRelation["Project_Manager"]
    
    def __str__(self):
        return self.name_user, self.user_hash_password
