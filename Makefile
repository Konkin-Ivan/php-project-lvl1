install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-nod:
	./bin/brain-nod

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin