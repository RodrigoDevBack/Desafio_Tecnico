from pydantic import BaseModel

class addProject(BaseModel):
    name: str
    description: str
    status: str

class idGet(BaseModel):
    id: int
    
class editProject(BaseModel):
    name: str
    description: str
    status: str 