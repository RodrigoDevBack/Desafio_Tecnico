from pydantic import BaseModel

class add_project(BaseModel):
    name: str
    description: str
    status: str