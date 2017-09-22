<?php

use function Eloquent\Phony\Pho\spy;

describe('EventEmitter', function () {
    beforeEach(function () {
        $this->emitter = new EventEmitter();

        $this->spyA = spy();
        $this->spyB = spy();
        $this->spyC = spy();
        $this->spyD = spy();
    });

    describe('on()', function () {
        it('adds listeners to the correct events', function () {
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventB', $this->spyB);
            $this->emitter->on('eventA', $this->spyC);
            $this->emitter->on('eventB', $this->spyD);
            $this->emitter->on('eventA', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyA, $this->spyC, $this->spyA]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyB, $this->spyD]);
        });
    });

    describe('once()', function () {
        it('removes the listener once it is called', function () {
            $this->emitter->once('eventA', $this->spyA);

            $this->emitter->emit('eventA', [1, 2]);
            $this->emitter->emit('eventA', [3, 4]);

            $this->spyA->once()->called();
            $this->spyA->calledWith(1, 2);
        });
    });

    describe('removeListener()', function () {
        it('removes listeners from the correct events', function () {
            $this->emitter->removeListener('no-listeners', function () {});

            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventA', $this->spyB);
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventB', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyA, $this->spyB, $this->spyA]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);

            $this->emitter->removeListener('eventA', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyB, $this->spyA]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);

            $this->emitter->removeListener('eventA', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyB]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);

            $this->emitter->removeListener('eventA', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyB]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);
        });
    });

    describe('removeAllListeners()', function () {
        it('removes all listeners from a specific event', function () {
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventA', $this->spyB);
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventB', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyA, $this->spyB, $this->spyA]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);

            $this->emitter->removeAllListeners('eventA');

            expect($this->emitter->listeners('eventA'))->toBe([]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);
        });

        it('removes all listeners from all events', function () {
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventA', $this->spyB);
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventB', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyA, $this->spyB, $this->spyA]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyA]);

            $this->emitter->removeAllListeners();

            expect($this->emitter->listeners('eventA'))->toBe([]);
            expect($this->emitter->listeners('eventB'))->toBe([]);
        });
    });

    describe('listeners()', function () {
        it('returns the existing listeners', function () {
            expect($this->emitter->listeners('eventA'))->toBe([]);

            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventB', $this->spyB);
            $this->emitter->on('eventA', $this->spyC);
            $this->emitter->on('eventB', $this->spyD);
            $this->emitter->on('eventA', $this->spyA);

            expect($this->emitter->listeners('eventA'))->toBe([$this->spyA, $this->spyC, $this->spyA]);
            expect($this->emitter->listeners('eventB'))->toBe([$this->spyB, $this->spyD]);
        });
    });

    describe('emit()', function () {
        it('emits events to the correct listeners', function () {
            $this->emitter->on('eventA', $this->spyA);
            $this->emitter->on('eventB', $this->spyB);
            $this->emitter->on('eventA', $this->spyC);
            $this->emitter->on('eventB', $this->spyD);
            $this->emitter->on('eventA', $this->spyA);

            $this->emitter->emit('eventA', [1, 2]);
            $this->emitter->emit('eventA', [3, 4]);
            $this->emitter->emit('eventA');
            $this->emitter->emit('no-listeners');

            $this->spyA->calledWith(1, 2);
            $this->spyC->calledWith(1, 2);
            $this->spyA->calledWith(3, 4);
            $this->spyC->calledWith(3, 4);
            $this->spyA->calledWith();
            $this->spyC->calledWith();

            $this->spyB->never()->called();
            $this->spyD->never()->called();
        });
    });
});
