A `Codebase` is a collection of `Features` and `Bugs`.

A `Feature` has a certain level of `TestCoverage` (in %)

During development, a `Feature` can get more testCoverage, at a cost of `Time`.
The odds of finding a `Bug` is an inverse function of the `TestCoverage`.
(the more test coverage, the lower the chance)

`Development` is a phase where new `Features` can be built, `testCoverage` can be increased or `Bugs` can be fixed, using `Time`.
`Production` is a phase where the `Codebase` is put to use and new `Bugs` will be reported.
Existence of `Bugs` affect the available `Time` during the `Development` phase.

A procedure called `ManualTesting` can be used to find `Bugs` after development, and lower the odds
of having bugs reported during `Production`. It comes at a cost of `Time` per `Feature`.

An `Iteration` consists of one `Development` and one `Production` phase.

A `Lifecycle` is the entire history of a codebase, it consists of a list of `Iterations`, and the codebase after each iteration.

A `Team` works on a single `Codebase` during the `Lifecycle` of that codebase, planning the `Iterations` as they go.
