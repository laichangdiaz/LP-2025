import typer
import json
from prettytable import PrettyTable

# Crear el inicializador del Typer
app = typer.Typer()


# Crear tarea y usar el comando para ser reconocido por el Typer
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

    # Listado de Tareas
    ver_tareas()
        

@app.command()
def ver_tareas():
    with open("Data/Data.json", "r") as file:
        data = json.load(file)
        table = PrettyTable()
        # Asignacion de los encabezados de la tabla
        table.field_names = ["Name", "Description"]
        for task in data:
            #Agregar filas a la tabla
            table.add_row([task["name"], task["description"]])
        print(table)