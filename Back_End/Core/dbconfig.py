from fastapi import FastAPI
from tortoise.contrib.fastapi import register_tortoise
from Core import define_router

def config_router(api: FastAPI):
    api.include_router(define_router.router)

def configure_db(app: FastAPI):
    register_tortoise(
        app=app,
        config={
            'connections': {
                # Dict format for connection
                'default': {
                    'engine': 'tortoise.backends.asyncpg',
                    'credentials': {
                        'host': 'localhost',
                        'port': '5432',
                        'user': 'postgres',
                        'password': 'titan',
                        'database': 'postgres',
                    }
                },
                # Using a DB_URL string
                'default': 'postgres://postgres:titan@localhost:5432/postgres'
            },
            'apps': {
                'models': {
                    'models': ['Models.models'],
                    # If no default_connection specified, defaults to 'default'
                    'default_connection': 'default',
                }
            }
        },
        generate_schemas=True,
        add_exception_handlers=True   
        )