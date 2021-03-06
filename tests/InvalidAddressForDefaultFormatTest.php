<?php
use Noxxienl\Nladdresslexer\AddressParser;

$addresses = [
    '12, stationstraat' => [
        'street' => '12',
        'number' => '0',
        'suffix' => 'tationstraat',
    ],

    '61, Plein 1926 A' => [
        'street' => '61, Plein',
        'number' => '1926',
        'suffix' => 'A'
    ],

    '123 Main Street Smallville, Idaho 12345' => [
        'street' => '123 Main Street Smallville, Idaho',
        'number' => '12345',
        'suffix' => null,
    ],

    '118 rue Marguerite' => [
        'street' => '118 rue Marguerite',
        'number' => null,
        'suffix' => null,
    ]
];

foreach ($addresses as $address => $evaluated) {
    it('cannot parse address "'.$address.'"', function() use ($address, $evaluated) {
        $parser = new AddressParser($address);
        $parser->evaluate();

        assertEquals($evaluated['street'], $parser->getStreet());
        assertEquals($evaluated['number'], $parser->getNumber());
        assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('invalid_address_notations');
}