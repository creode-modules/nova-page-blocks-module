<?php

namespace Modules\PageBlocks\app\PageBlocks;

use Modules\Pages\app\Abstracts\PageBlockAbstract;
use Modules\PageBlocks\app\Services\ConfigService;
use Laravel\Nova\Fields\Select as SelectField;
use Modules\NovaMedia\app\Nova\Fields\MediaField;
use Whitecube\NovaFlexibleContent\Flexible as FlexibleField;
use Laravel\Nova\Fields\Text as TextField;

class BannerBlock extends PageBlockAbstract
{

    protected $label = 'Banner';
    protected $name = 'banner';
    protected $view = 'page-blocks::banner';

    protected function fields()
    {
        return [
            SelectField::make('Format')
                ->options(
                    function() {
                        return ConfigService::getBlockFormatOptions($this->name);
                    }
                )
                ->rules('required'),
            MediaField::make('Media')
                ->nullable(),
            FlexibleField::make('Content')
                ->fullWidth()
                ->collapsed()
                ->button('Add Content')
                ->addLayout(
                    'Heading 1',
                    'heading_1',
                    [
                        TextField::make('Text')
                            ->translatable()
                            ->rules('required'),
                    ]
                )
                ->addLayout(
                    'Heading 2',
                    'heading_2',
                    [
                        TextField::make('Text')
                            ->translatable()
                            ->rules('required'),
                    ]
                )
                ->addLayout(
                    'Text',
                    'text',
                    [
                        TextField::make('Text')
                            ->translatable()
                            ->rules('required'),
                    ]
                )
                ->addLayout(
                    'Link',
                    'link',
                    [
                        TextField::make('Text')
                            ->translatable()
                            ->rules('required'),
                        TextField::make('HREF')
                            ->translatable()
                            ->rules('required'),
                        TextField::make('Title')
                            ->translatable()
                            ->rules('required'),
                        SelectField::make('Target')
                            ->options(
                                [
                                    '_self' => 'Self',
                                    '_blank' => 'Blank',
                                ]
                            ),
                    ]
                ),
        ];
    }

}