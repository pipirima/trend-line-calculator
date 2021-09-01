help:
	@echo "build-env      Builds environment"
	@echo "run-unit-tests Run unit tests on test container"

build-env:
	@echo "Building environment"
	bash cli/build-env.sh

run-unit-tests:
	@echo "Run unit tests on test container"
	bash cli/run-unit-tests.sh
