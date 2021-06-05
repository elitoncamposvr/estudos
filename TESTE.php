<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>details-menu demo</title>
  <style>
    details-menu {
      background: white;
      border: 1px solid;
      display: block;
      padding: 4px;
      width: 200px;
    }
    button, label[tabindex] {
      font-family: inherit;
      font-size: inherit;
      display: block;
      background: none;
      border: 0;
      width: 100%;
      text-align: left;
      padding: 0;
    }
  </style>
</head>
<body>
  <details>
    <summary>Best robot: <span data-menu-button>Unknown</span></summary>
    <details-menu>
      <button type="button" role="menuitem" data-menu-button-text>Hubot</button>
      <button type="button" role="menuitem" data-menu-button-text>Bender</button>
      <button type="button" role="menuitem" data-menu-button-text>BB-8</button>
    </details-menu>
  </details>

  <details>
    <summary>Best robot: <span data-menu-button>Unknown</span></summary>
    <details-menu>
      <label tabindex="0" role="menuitemradio" data-menu-button-text><input type="radio" name="robot"> Hubot</label>
      <label tabindex="0" role="menuitemradio" data-menu-button-text><input type="radio" name="robot"> Bender</label>
      <label tabindex="0" role="menuitemradio" data-menu-button-text><input type="radio" name="robot"> BB-8</label>
    </details-menu>
  </details>

  <details>
    <summary>Favorite robots</summary>
    <details-menu>
      <label tabindex="0" role="menuitemcheckbox"><input type="checkbox" name="robot"> Hubot</label>
      <label tabindex="0" role="menuitemcheckbox"><input type="checkbox" name="robot"> Bender</label>
      <label tabindex="0" role="menuitemcheckbox"><input type="checkbox" name="robot"> BB-8</label>
    </details-menu>
  </details>

  <details>
    <summary data-menu-button>Favorite robots</summary>
    <details-menu>
      <button type="submit" name="robot" value="Hubot" role="menuitemradio" data-menu-button-text>Hubot</button>
      <button type="submit" name="robot" value="Bender" role="menuitemradio" data-menu-button-text>Bender</button>
      <button type="submit" name="robot" value="BB-8" role="menuitemradio" data-menu-button-text>BB-8</button>
    </details-menu>
  </details>

  
</body>
</html>