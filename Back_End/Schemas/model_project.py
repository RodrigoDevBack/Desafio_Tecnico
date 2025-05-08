from pydantic import BaseModel

class addProject(BaseModel):
    name: str
    description: str
    status: str
    
class id_project(BaseModel):
    id: int
