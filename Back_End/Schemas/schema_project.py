from pydantic import BaseModel
from typing import Optional

class Project_Create(BaseModel):
    name: str
    description: str
    status: str

class Get_Id(BaseModel):
    id: int
    
class Project_Update(BaseModel):
    name: Optional[str] = None
    description: Optional[str] = None
    status: Optional[str] = None
