help:
	@echo "build     Builds environment"
	@echo "unit-test Run unit tests on test container"

build-env:
	@echo "Building environment"
	bash cli/build-env.sh

unit-test:
	@echo "Run unit tests on test container"
	bash cli/unit-test.sh
