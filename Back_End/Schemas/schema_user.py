from pydantic import BaseModel
from typing import Optional

class User_Register(BaseModel):
    name: str
    password: str
    
class Get_Id(BaseModel):
    id: int
    
class User_Update(BaseModel):
    name_user: Optional[str] = None
    user_hash_password: Optional[str] = None
    