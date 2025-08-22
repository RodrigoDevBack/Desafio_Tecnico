from pydantic import BaseModel
from typing import Optional
from pydantic import field_validator

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
    image_link: Optional[str] = None
    
    @field_validator('name', 'description', 'status', 'image_link')
    @classmethod
    def empty_string_to_none(cls, v):
        if v == "":
            return None
        return v

