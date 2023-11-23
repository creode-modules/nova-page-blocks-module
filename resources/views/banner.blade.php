<banner format="{{ $format }}">
    @if($media)
        <template v-slot:media>
            @include('nova-media::media', [ 'id' => $media ])
        </template>
    @endif
    @if($content)
        @foreach ($content as $contentItem)
            @switch($contentItem['layout'])
                @case('heading_1')
                    @if(!$contentItem['attributes']['text'])
                        @break
                    @endif
                    <bannerheading1>
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </bannerheading1>
                @break
                @case('heading_2')
                    @if(!$contentItem['attributes']['text'])
                        @break
                    @endif
                    <bannerheading2>
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </bannerheading2>
                @break
                @case('text')
                    @if(!$contentItem['attributes']['text'])
                        @break
                    @endif
                    <bannertext>
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </bannertext>
                @break
                @case('link')
                    @if(!$contentItem['attributes']['text'])
                        @break
                    @endif
                    @if(!$contentItem['attributes']['href'])
                        @break
                    @endif
                    @if(!$contentItem['attributes']['title'])
                        @break
                    @endif
                    @if(!$contentItem['attributes']['target'])
                        @break
                    @endif
                    <bannercta
                        href="{{ $contentItem['attributes']['href'][app()->currentLocale()] }}"
                        title="{{ $contentItem['attributes']['title'][app()->currentLocale()] }}"
                        target="{{ $contentItem['attributes']['target'] }}"
                    >
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </bannercta>
                @break
            @endswitch
        @endforeach
    @endif
</banner>
