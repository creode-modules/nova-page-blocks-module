<banner :format="{{ $format }}" v-cloak>
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
                    <banner-heading1>
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </banner-heading1>
                @break
                @case('heading_2')
                    @if(!$contentItem['attributes']['text'])
                        @break
                    @endif
                    <banner-heading2>
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </banner-heading2>
                @break
                @case('text')
                    @if(!$contentItem['attributes']['text'])
                        @break
                    @endif
                    <banner-text>
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </banner-text>
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
                    <banner-cta
                        href="{{ $contentItem['attributes']['href'][app()->currentLocale()] }}"
                        title="{{ $contentItem['attributes']['title'][app()->currentLocale()] }}"
                        target="{{ $contentItem['attributes']['target'] }}"
                    >
                        {{ $contentItem['attributes']['text'][app()->currentLocale()] }}
                    </banner-cta>
                @break
            @endswitch
        @endforeach
    @endif
</banner>
