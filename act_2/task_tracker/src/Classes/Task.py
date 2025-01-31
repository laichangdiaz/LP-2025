import typer
import json
from prettytable import PrettyTable

app = typer.Typer()

@app.command()
def crear_tarea(name: str, description: str):
    print(f"Task created: {name} - {description}")
    data = []
    with open("Data/Data.json", "r") as file:
        data = json.load(file)

    data.append({
        "name": name,
        "description": description
    })

    with open("Data/Data.json", "w") as file:
        json.dump(data, file)
        
    ver_tareas()
        

@app.command()
def ver_tareas():
    with open("Data/Data.json", "r") as file:
        data = json.load(file)
        table = PrettyTable()
        table.field_names = ["Name", "Description"]
        for task in data:
            table.add_row([task["name"], task["description"]])
        print(table)