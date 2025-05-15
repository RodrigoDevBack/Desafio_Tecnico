from tortoise.models import Model
from tortoise import fields

class Project_Manager(Model):
    id = fields.IntField(primary_key = True)
    name = fields.CharField(max_length = 60)
    description = fields.TextField()
    status = fields.TextField()
    created_at = fields.DatetimeField(auto_now = True)
    
    def __str__(self):
        return self.description, self.status


class User_Manager(Model):
    name_user = fields.TextField()
    user_password = fields.TextField()
    
    def __str__(self):
        return self.id_user, self.user_password
    