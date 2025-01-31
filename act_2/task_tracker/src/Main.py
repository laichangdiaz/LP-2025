from Classes import Task
import os

def clear():
    if os.name == "nt":
        os.system("cls")
    else:
        os.system("clear")

clear()

app = Task.app

if __name__ == "__main__":
    print("""
  _____        _     _____            _           
 |_   _|_ _ __| |__ |_   _| _ __ _ __| |_____ _ _ 
   | |/ _` (_-< / /   | || '_/ _` / _| / / -_) '_|
   |_|\__,_/__/_\_\   |_||_| \__,_\__|_\_\___|_|  
                                                  
""")
    app()