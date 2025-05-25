from pydantic import BaseModel
from pydantic import field_validator, Field
from typing import Optional
from ..Core.security import hash_password

class User_Register(BaseModel):
    name: str
    password: str
    
    @field_validator('password', mode="before")
    def password_hash(cls, v):
        return hash_password(v)

   
class Get_Id(BaseModel):
    id: int


class Get_Name(BaseModel):
    search_user: str

  
class User_Update(BaseModel):
    name_user: Optional[str] = None
    user_hash_password: Optional[str] = Field(alias="password")
    
    @field_validator('name_user', 'user_hash_password', mode="before")
    @classmethod
    def empty_string_to_none(cls, v):
        if v == "":
            return None
        return v
    