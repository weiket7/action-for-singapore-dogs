<?php use App\Helpers\BackendHelper; ?>

<style>
  table {
    border: 1px solid;
    border-collapse: collapse;
  }
  
  td {
    border: 1px solid;
  }
</style>

<table>
  <thead>
  <tr>
    <th width="150px">Name</th>
    <th>Value</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Application</td>
    <td>{{ config('app.name') }}</td>
  </tr>
  <tr>
    <td>Mail</td>
    <td>
      Driver: {{ env('MAIL_DRIVER') }}<br>
      Host: {{ env('MAIL_HOST') }}<br>
      Port: {{ env('MAIL_PORT') }}<br>
      Username: {{ env('MAIL_USERNAME') }}
    </td>
  </tr>
  <tr>
    <td>Laravel</td>
    <td>
      <?php $app = App::getFacadeApplication(); ?>
      {{$app::VERSION}}
    </td>
  </tr>
  <tr>
    <td>PHP</td>
    <td>
      {{phpversion()}}<br>
      <?php echo "GD: ", extension_loaded('gd') ? 'OK' : 'MISSING', '<br>';
      echo "XML: ", extension_loaded('xml') ? 'OK' : 'MISSING', '<br>';
      echo "zip: ", extension_loaded('zip') ? 'OK' : 'MISSING', '<br>'; ?>
    </td>
  </tr>
  <tr>
    <td>Env</td>
    <td>{{App::environment()}}</td>
  </tr>
  <tr>
    <td>Timezone</td>
    <td>{{date_default_timezone_get()}}</td>
  </tr>
  <tr>
    <td>Upload</td>
    <td>
      Directory:
      @if (App::environment('local'))
       {{ $_SERVER['DOCUMENT_ROOT'] . "/asd/public/assets/images/" }}
      @else
       {{ $_SERVER['DOCUMENT_ROOT'] . "/assets/images/" }}
      @endif
      <br>
      upload_max_filesize: {{ ini_get("upload_max_filesize ") }}<br>
      post_max_size: {{ ini_get("post_max_size ") }}<br>
      max_execution_time: {{ ini_get("max_execution_time") }}
    </td>
  </tr>
  <tr>
    <td>Auth</td>
    <td>
      {{ Auth::user() }}
    </td>
  </tr>
  <tr>
    <td>Queue Driver</td>
    <td>
      {{ env('QUEUE_DRIVER') }}
    </td>
  </tr>
</table>