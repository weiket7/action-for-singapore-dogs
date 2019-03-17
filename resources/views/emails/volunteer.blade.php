Name: {{ $volunteer->name }}<br>
Email: {{ $volunteer->email }}<br>
Mobile: {{ $volunteer->mobile }}<br>
Birthday: {{ \App\Helpers\ViewHelper::formatDate($volunteer->birthday) }}<br>
Gender: {{ $volunteer->gender == "M" ? "Male" : "Female" }}<br>
Occupation: {{ $volunteer->occupation }}<br>
Amount of time he/she can afford: {{ $volunteer->availability }}<br>
<br>
Interested in:<br>
@foreach($interests as $interest)
  {{ $interest }}<br>
@endforeach
<br>

@if(in_array("Fostering", $interests))
  Preferred Dog Size: {{ $volunteer->preferred_dog_size }}<br>
  Number of dogs currently: {{ $volunteer->current_no_of_dogs }}<br>
@endif

@if(in_array("Publicity", $interests))
  Area to help in: {{ $volunteer->publicity_area }}<br>
@endif

@if(in_array("Logistics", $interests))
  Type of vehicle: {{ $volunteer->vehicle }}<br>
@endif