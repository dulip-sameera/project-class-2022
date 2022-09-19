const responseStatus = {
  OK: 200,
};

const view = document.getElementById("view");

document.addEventListener("DOMContentLoaded", init);

function init() {
  loadEmployeeView();
  loadEmployeeForm();
}

//-----------------------------------------------------------------
//----------------- FORM -----------------------------------------
const btnAdd = document.getElementById("submit");
const inputName = document.getElementById("name");
const inputAge = document.getElementById("age");
const selectGender = document.getElementById("gender");

btnAdd.addEventListener("click", () => {
  addEmployee(inputName.value, inputAge.value, selectGender.value);
});

function loadEmployeeForm() {
  const httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = () => {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === responseStatus.OK) {
        showGender(httpRequest.responseText, selectGender);
      }
    }
  };
  httpRequest.open("GET", "../server/gender_view.php", true);
  httpRequest.send();
}

function showGender(json, container) {
  const genders = JSON.parse(json);
  selectGender.innerHTML = "";

  genders.forEach((gender) => {
    const option = document.createElement("option");
    option.textContent = gender.name;
    option.value = gender.id;
    container.appendChild(option);
  });
}

function addEmployee(name, age, gender) {
  const wantToAdd = window.confirm(
    `Add Employee: 
                  Name: ${name}
                  Age: ${age}
                  Gender: ${gender}`
  );

  if (wantToAdd) {
    const httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = () => {
      if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === responseStatus.OK) {
          loadEmployeeView();
        }
      }
    };

    httpRequest.open("POST", "../server/employee_add.php", true);
    httpRequest.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    httpRequest.send(`name=${name}&age=${age}&gender=${gender}`);

    inputName.value = "";
    inputAge.value = "";
    // selectGender.value = "";
  }
}

//-----------------------------------------------------------------

function loadEmployeeView() {
  //creating an ajax object
  const httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = () => {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === responseStatus.OK) {
        showTable(httpRequest.responseText, view);
      }
    }
  };
  httpRequest.open("GET", "../server/employee_view.php", true);
  httpRequest.send();
}

function showTable(data_json, container) {
  container.innerHTML = "";
  const data = JSON.parse(data_json);
  container.appendChild(createTable(data));
}

function createTable(data) {
  const FIRST_ELEMENT = 0;

  const table = document.createElement("table");

  const element = data[FIRST_ELEMENT];

  table.appendChild(createTableHead(element));

  table.appendChild(createTableBody(data));

  return table;
}

function createTableHead(element) {
  const thead = document.createElement("thead");
  const tr = document.createElement("tr");
  const elementKeysList = Object.keys(element);
  for (let i = 0; i < elementKeysList.length + 1; i++) {
    if (i < elementKeysList.length) {
      const th = document.createElement("th");
      th.textContent = elementKeysList[i];
      tr.appendChild(th);
    } else {
      const th = document.createElement("th");
      tr.appendChild(th);
    }
  }
  thead.appendChild(tr);
  return thead;
}

function createTableBody(data) {
  const tbody = document.createElement("tbody");
  data.forEach((element) => {
    const tr = document.createElement("tr");
    const keysList = Object.keys(element);
    for (let i = 0; i < keysList.length + 1; i++) {
      if (i < keysList.length) {
        const td = document.createElement("td");
        td.textContent = element[keysList[i]];
        tr.appendChild(td);
      } else {
        const td = document.createElement("td");
        const btnDelete = document.createElement("input");
        btnDelete.type = "button";
        btnDelete.value = "DELETE";

        btnDelete.addEventListener("click", () => {
          const wantToDelete = window.confirm(
            `Delete Employee: ${element[keysList[1]]}`
          );
          if (wantToDelete) {
            deleteEmployee(element[keysList[0]]);
          }
        });
        td.appendChild(btnDelete);
        tr.appendChild(td);
      }
    }
    tbody.appendChild(tr);
  });
  return tbody;
}

function deleteEmployee(id) {
  const httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = () => {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === responseStatus.OK) {
        loadEmployeeView();
      }
    }
  };

  httpRequest.open("GET", `../server/employee_delete.php?id=${id}`, true);
  httpRequest.send();
}
