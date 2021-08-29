help:
	@echo "build-env     Builds environment"
	@echo "run-unit-test Run unit tests on test container"

build-env:
	@echo "Building environment"
	bash cli/build-env.sh

run-unit-test:
	@echo "Run unit tests on test container"
	bash cli/run-unit-test.sh
