from pydantic import BaseModel
from typing import List
from datetime import datetime

class Project_Response(BaseModel):
    id: int
    name: str
    description: str
    status: str
    created_at: datetime
    
    class Config:
        orm_mode = True
        json_encoders = {
            datetime: lambda v: v.isoformat(),
        }


class User_Response(BaseModel):
    id_user: int
    name_user: str
    projects: List[Project_Response]
    
    class Config:
        orm_mode = True


