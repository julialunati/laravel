<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $news = [
        [
            'id' => 1,
            'title' => 'News 1',
            'description' => 'Фраза из школы: "London is the capital of Great Britain and Northern Ireland" некорректна.',
        ],
        [
            'id' => 2,
            'title' => 'News 2',
            'description' => 'Great Britain — остров, у которого нет так называемой "столицы".',
        ],
        [
            'id' => 3,
            'title' => 'News 3',
            'description' => 'United Kingdom состоит из 3+1 частей: Scotland (столица Edinburgh), Wales (столица Cardiff), England (столица London). Все три они находятся на одном острове Great Britain.',
        ],
        [
            'id' => 4,
            'title' => 'News 4',
            'description' => 'В United Kingdom входит Northern Ireland (столица Belfast), которая находится на острове Ireland и граничит со страной Ireland, у которой столица Dublin, но которая не входит в UK.',
        ],
        [
            'id' => 5,
            'title' => 'News 5',
            'description' => 'Ireland и Northen Ireland — два разных государственных объекта, находящихся на одном острове, который называется Ireland.',
        ]
    ];

    protected array $arr = [
        'London' => [
            [
                'id' => 1,
                'title' => 'News 1',
                'description' => 'Фраза из школы: "London is the capital of Great Britain and Northern Ireland" некорректна.',
            ],
            [
                'id' => 2,
                'title' => 'News 2',
                'description' => 'Great Britain — остров, у которого нет так называемой "столицы".',
            ],
            [
                'id' => 3,
                'title' => 'News 3',
                'description' => 'United Kingdom состоит из 3+1 частей: Scotland (столица Edinburgh), Wales (столица Cardiff), England (столица London). Все три они находятся на одном острове Great Britain.',
            ],
            [
                'id' => 4,
                'title' => 'News 4',
                'description' => 'В United Kingdom входит Northern Ireland (столица Belfast), которая находится на острове Ireland и граничит со страной Ireland, у которой столица Dublin, но которая не входит в UK.',
            ],
            [
                'id' => 5,
                'title' => 'News 5',
                'description' => 'Ireland и Northen Ireland — два разных государственных объекта, находящихся на одном острове, который называется Ireland.',
            ]
        ],
        'Moscow' => [
            [
                'id' => 1,
                'title' => 'News 1',
                'description' => 'Moscow is the capital and most heavily populated city in Russia, as well as being the largest city on the European continent.',
            ],
            [
                'id' => 2,
                'title' => 'News 2',
                'description' => 'Arbat street is 520 years making it one of the oldest streets in Moscow.',
            ],
            [
                'id' => 3,
                'title' => 'News 3',
                'description' => 'Moscow claims the largest number of billionaires in the world. ',
            ],
            [
                'id' => 4,
                'title' => 'News 4',
                'description' => 'Moscow is regularly named one of the most expensive cities in the world',
            ],
        ],
        'NYC' => [
            [
                'id' => 1,
                'title' => 'News 1',
                'description' => 'New York City became the first capital of the United States in 1789.',
            ],
            [
                'id' => 2,
                'title' => 'News 2',
                'description' => 'More than 800 languages are spoken in New York City. As a result, it is the most linguistically diverse city in the world.',
            ],
            [
                'id' => 3,
                'title' => 'News 3',
                'description' => 'The Empire State Building gets hit by lightning around 23 times a year.',
            ],
            [
                'id' => 4,
                'title' => 'News 4',
                'description' => 'New York City’s Federal Reserve Bank has the largest gold storage in the world.',
            ],
        ],
        'Tokyo' => [
            [
                'id' => 1,
                'title' => 'News 1',
                'description' => 'Tokyo is the largest metropolitan area in the world, hosting over 36 million people spread over three prefectures',
            ],
            [
                'id' => 2,
                'title' => 'News 2',
                'description' => 'Tokyo has the most top-rated restaurants in the world. It is home to over 14 three-star Michelin restaurants.',
            ],
            [
                'id' => 3,
                'title' => 'News 3',
                'description' => 'The cherry blossom is the national symbol of Japan. In April, the trees flower for two weeks, during a period known as “Hanami.”',
            ],
            [
                'id' => 4,
                'title' => 'News 4',
                'description' => 'There are vending machines roughly every 12 meters in Tokyo, so you never have to worry about getting thirsty!',
            ]
        ],
        'Rio' => [
            [
                'id' => 1,
                'title' => 'News 1',
                'description' => 'Rio de Janeiro means January River, but the river is actually a bay.',
            ],
            [
                'id' => 2,
                'title' => 'News 2',
                'description' => 'Most of Rio’s samba schools are located in favelas.',
            ],
            [
                'id' => 3,
                'title' => 'News 3',
                'description' => 'Rio’s carnival party is the biggest carnival in the world',
            ],
            [
                'id' => 4,
                'title' => 'News 4',
                'description' => 'Rio de Janeiro has the world’s bluest sky',
            ],
        ]
    ];

    protected function getNews(): array
    {
        return $this->news;
    }

    public function getArr(): array 
    {
        return $this->arr;
    }
}
