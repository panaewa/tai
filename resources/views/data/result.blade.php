Date,Open,High,Low,Close,Volume
@foreach ($historicalData as $d)
{{ $d->getDate()->format('j-M-y') }},{{ $d->getOpen() }},{{ $d->getHigh() }},{{ $d->getLow() }},{{ $d->getClose() }},{{ $d->getVolume() }}
@endforeach