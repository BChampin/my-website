<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Bastien Champin</title>
  <meta http-equiv="Expires" content="-1">
  <meta http-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" type="image/x-icon" href="My_Logo.png" />
  <link type="text/css" rel="stylesheet" media="screen,projection" href="css.css" />
</head>
<body>
  My links <span></span>
  <br><br><table></table>

  <script src="jquery.min.js" charset="utf-8"></script>
  <script>
  function generateTable(table, data) {
    for (let element of data) {
      let row = table.insertRow()
      row.insertCell().appendChild(new DOMParser().parseFromString('<a target="_blank" rel="noreferrer noopener" class="link" href="'+element['url']+'">'+element['name']+'</a>', 'text/html').body.firstChild);
      row.insertCell().appendChild(new DOMParser().parseFromString('<span onclick="deleteLink(\''+element['name']+'\')">&nbsp;&nbsp;✗</span>', 'text/html').body.firstChild);
    }
  }

  function loadJson() {
    return new Promise((resolve, reject) => {
      $.ajax('bk.json', {
        type: 'GET',
        success: function (data, status, xhr) {
          $('table').empty().append( "<thead><th>Link</th><th>Delete</th></thead>" )
          generateTable($('table')[0], data)
          resolve(data)
        },
        error: function (jqXhr, textStatus, errorMessage) { alert('Error loading !') }
      });
    })
  }

  async function addLink() {
    let name = prompt("Bookmark name");
    if (name != null) {
      let url = prompt("Bookmark link");
      if (url != null) {
        let json = await loadJson()
        json.push({"name":name, "url":url})
        saveJson(json)
      }
    }
  }

  async function deleteLink(name) {
    let json = await loadJson()
    saveJson(json.filter(e => e.name != name))
  }

  function saveJson(json) {
    $.ajax('save.php', {
      type: 'POST',
      data: {'json': json},
      success: function (data, status, xhr) { window.location.reload(true); alert('Bookmarks updated !'); },
      error: function (jqXhr, textStatus, errorMessage) { alert('Error saving!') }
    });
  }

  (function() {
    // Defining JS equivalent of Java hashCode method
    Object.defineProperty(String.prototype, 'hashCode', {
      value: function() {
        var hash = 0, i, chr;
        for (i = 0; i < this.length; i++) {
          chr   = this.charCodeAt(i);
          hash  = ((hash << 5) - hash) + chr;
          hash |= 0; // Convert to 32bit integer
        }
        return hash;
      }
    });
    let mdp = prompt("What u want ?")
    if (mdp != null && mdp.hashCode() == "-1011452135") {
      $("span").html('<a onclick="addLink()">Add</a>');
      loadJson();
    }
  })();
  </script>
</body>
</html>
