<% String name1 = "Nimal"; %> <% String name2 = "Kamal"; %> <% String title =
"Employee"; %>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee</title>
  </head>
  <body>
    <h1><% out.println(title); %></h1>
    <table cellspacing="0" cellpadding="5" border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><% out.println(name1); %></td>
        </tr>
        <tr>
          <td>2</td>
          <td><% out.println(name2); %></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
