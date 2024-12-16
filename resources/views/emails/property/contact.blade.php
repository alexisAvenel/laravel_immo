<x-mail::message xmlns:x-mail="http://www.w3.org/1999/html">
# Nouvelle demande de contact

Une nouvelle demande de contact a été faite pour le bien [{{$property->title}}]({{route('properties.show', ['property' => $property])}}).

- Prénom : {{$data['firstname']}}
- Nom : {{$data['lastname']}}
- Téléphone : {{$data['phone']}}
- Email : {{$data['email']}}

**Message:**

<p>{{$data['message']}}</p>

</x-mail::message>
