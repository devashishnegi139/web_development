function addTask(){
    const taskInput = document.getElementById("taskInput");
    const taskText = taskInput.value.trim();
    if(taskText !== ""){
        const taskList = document.getElementById("taskList");
        const taskItem = document.createElement("li");
        taskItem.className = "task";
        taskItem.innerHTML = `<span>${taskText}</span>
                            <button onclick = "removeTask(this);">Remove</button>`;
        taskList.appendChild(taskItem);
        taskInput.value = "";
    }
}

function removeTask(button){
    const taskItem = button.parentElement;
    taskItem.remove();
}