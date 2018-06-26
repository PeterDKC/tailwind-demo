<?php

namespace App;

use TwoThirds\EloquentTraits\Enums;
use Illuminate\Database\Eloquent\Model;
use TwoThirds\EloquentTraits\DynamicMutators;

class Tree extends Model
{
    use Enums, DynamicMutators;

    /**
     * The fillable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'species',
        'genus',
        'family',
        'habitat',
        'notes',
    ];

    /**
     * The valid Genuses.
     *
     * @var array
     */
    protected $enumGenera = [
        'Amelanchier',
        'Cassia',
        'Viburnum',
        'Bouvardia',
        'Pyracantha',
        'Cupressus',
    ];

    /**
     * The valid Families.
     *
     * @var array
     */
    protected $enumFamilies = [
        'Rosaceae',
        'Fabaceae',
        'Myrtaceae',
        'Caprifoliaceae',
        'Grossulariaceae',
        'Euphorbiaceae',
        'Acanthaceae',
        'Meliaceae',
        'Cupressaceae',
    ];

    /**
     * The valid Habitats.
     *
     * @var array
     */
    protected $enumHabitats = [
        'Zone 4',
        'Zone 5',
        'Zone 5-7',
        'Zone 4-6',
        'Zone 7',
        'Zone 4-8',
    ];
}
