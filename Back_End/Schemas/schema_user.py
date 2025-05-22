from pydantic import BaseModel
from pydantic import field_validator
from typing import Optional

class User_Register(BaseModel):
    name: str
    password: str

   
class Get_Id(BaseModel):
    id: int


class Get_Name(BaseModel):
    search_user: str

  
class User_Update(BaseModel):
    name_user: Optional[str] = None
    user_hash_password: Optional[str] = None
    
    @field_validator('name_user', 'user_hash_password')
    @classmethod
    def empty_string_to_none(cls, v):
        if v == "":
            return None
        return v
    