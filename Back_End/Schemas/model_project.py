from pydantic import BaseModel

class add_project(BaseModel):
    name: str
    description: str
    status: str
    
class id_project(BaseModel):
    id: int
