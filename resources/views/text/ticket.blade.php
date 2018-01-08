----------------------------------
      LOTERIA DE ANIMALITOS
----------------------------------
{{ env('APP_LOCAL_NAME') }}
TICKET: {{ $ticket->public_id }}
FECHA: {{ date_format($ticket->created_at, 'd-m-Y h:i a') }}
TAQUILLA: {{ $ticket->user->name }}
SORTEOS:
@foreach($ticket->dailySorts()->orderBy('time_sort')->get() as $dailySort)
{{ strtoupper($dailySort->sort->description . ' ' . $dailySort->timeSortFormat()) }}
@endforeach

ANIMALITO                MONTO
----------------------------------
@foreach($ticket->animals as $animal)
{{ $animal->getLabelMoreSpace() }}{{ $animal->pivot->amount }}
@endforeach
----------------------------------
TOTAL                  {{ number_format($ticket->amount(), 2, ',', '.') }}

REVISE SU TICKET
VALIDO POR 3 DIAS


----------------------------------