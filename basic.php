<!DOCTYPE html>
<html>
<head>
  <title>Stupid jQuery table sort</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="stupidtable.js"></script>
  <script>
    $(function(){
        $("table").stupidtable();
    });
  </script>
  <style type="text/css">
    table {
      border-collapse: collapse;
    }
    th, td {
      padding: 5px 10px;
      border: 1px solid #999;
    }
    th {
      background-color: #eee;
    }
    th[data-sort]{
      cursor:pointer;
    }
    tr.awesome{
      color: red;
    }
  </style>
  </style>
</head>

<body>

  <h1>Stupid jQuery table sort!</h1>

  <p>This example shows how a sortable table can be implemented with very little configuration. Simply specify the data type on a <code>&lt;th&gt;</code> element using the <code>data-sort</code> attribute, and the plugin handles the rest.</p>

  <table>
    <thead>
      <tr>
        <th data-sort="int">int</th>
        <th data-sort="float">float</th>
        <th data-sort="string">string</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>15</td>
        <td>-.18</td>
        <td>banana</td>
      </tr>
      <tr class="awesome">
        <td>95</td>
        <td>36</td>
        <td>coke</td>
      </tr>
      <tr>
        <td>2</td>
        <td>-152.5</td>
        <td>apple</td>
      </tr>
      <tr>
        <td>-53</td>
        <td>88.5</td>
        <td>zebra</td>
      </tr>
      <tr>
        <td>195</td>
        <td>-858</td>
        <td>orange</td>
      </tr>
    </tbody>
  </table>

</body>
</html>
