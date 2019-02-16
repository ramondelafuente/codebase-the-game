A `Codebase` is a collection of `Features`
A `Feature` has a certain level of `TestCoverage` (in %)
A `Feature` has 0 or more `Bugs`.
`Development` is a phase where new `Features` can be built, or `Bugs` can be fixed, using `Time`.
`Production` is a phase where the `Codebase` is put to use and new Bugs will be reported.
Any new bugs affect the available `Time` during development. 

The odds of finding a `Bug` in a `Feature` is an inverse function of the `TestCoverage`.
(the more test coverage, the lower the chance)

A procedure called `ManualTesting` can be used to find `Bugs` after development, and lower the odds
of having bugs reported during `Production`. It comes at a cost of `Time` per `Feature`.

An `Iteration` consists of one `Development` and one `Production` phase.
A `LifeCycle` is the entire history of a codebase, it consists of a list of `Iterations`.
