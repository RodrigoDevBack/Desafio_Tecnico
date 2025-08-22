from pydantic import BaseModel
from typing import List, Optional
from datetime import datetime

class Project_Response(BaseModel):
    id: Optional[int]
    name: Optional[str]
    description: Optional[str]
    status: Optional[str]
    image_link: Optional[str] 
    created_at: Optional[datetime]
    
    class Config:
        from_attributes = True
        json_encoders = {
            datetime: lambda v: v.isoformat(),
        }


class User_Response(BaseModel):
    id_user: int
    name_user: str
    projects: List[Project_Response]
    
    class Config:
        from_attributes = True


