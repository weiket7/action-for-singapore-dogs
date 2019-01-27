@extends('template', ['title'=>'ASD - Gift Shop'])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Gift Shop</h2>
      </div>
    </div>
    
    Sadly, despite our best efforts, we are not always able to find all our dogs a home they can call their own. Neglected, abused and abandoned to a harsh life on the streets, the life stories of some of our ‘toughest cases’ are heartbreaking. The tough shells these ‘mischievous’ ‘trouble-makers’ wear often hide bewilderment, apprehension and fear.
    <br><br>
    
    While the search for suitable homes and fosterers remain an uphill battle, we will never make the choice to ‘give up’ on any of our charges in our care. At our Adoption & Rescue Centre, many of these dogs await their forever home after they have recovered from their harrowing ordeal out in the streets.
    <br><br>
    
    Yet others, who are health, happy and very adoptable, somehow miss out on the chance of a good home because of their overwhelming numbers and the pitifully small number of good, responsible people. Their hope lay in the windows of the <a href="{{ url('dogs-for-adoption') }}">Dogs For Adoption</a> section of our website.
    <br><br>
    
    From as little as S$35 a month, your sponsorship will go towards defraying the cost of your chosen dog’s boarding fees, nutritional needs and medical care.
    <br><br>
    
    Typically it takes about $300 to maintain a dog at our Adoption & Rescue Centre.
    <br><br>
    
    You can also choose to play an active role by visiting your dog after 3 months of sponsorship and soon your sponsored dog will experience plenty of positive experiences with humans.
    <br><br>
    
    As a sponsor, we keep you updated on the details of your sponsored dog(s).
    <br><br>
    
    You receive:
    <br>1.	A Sponsorship Certificate which includes the bio-data and photograph of your dog after 3 months of sponsorship.
    <br>2.	After 3 months of sponsorship, we can arrange a visit to our Adoption and Rescue Centre.
    3.	Free ASD life membership after 6 consecutive months of sponsorship.
    <br><br>
  
    Please download and fill in this <a href="{{ url('asd-sponsorship-form.pdf') }}" target="_blank">sponsorship form</a>.
  </div>
@endsection