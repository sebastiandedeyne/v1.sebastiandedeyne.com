import { Container, Point } from './space'

export interface MousePosition {
    x: number
    y: number
}

export interface State {
    mouse: MousePosition
}

const STATE: State = 
    {
        mouse: { x: 0, y: 0 }
    }

window.addEventListener('mousemove', e => STATE.mouse = { x: e.pageX, y: e.pageY })

export const query = 
    (selector: string, context: Element | Document = document): Element =>
        document.querySelector(selector)

export const queryAll = 
    (selector: string, context: Element | Document = document): Element[] =>
        Array.from(document.querySelectorAll(selector))

export const raf = 
    (callback: Function) =>
        (function run() {
            callback(STATE)
            window.requestAnimationFrame(run)
        })()

export const getCenter =
    (element: HTMLElement): Point =>
        ({
            x: element.offsetLeft + (element.offsetWidth / 2),
            y: element.offsetTop + (element.offsetHeight / 2),
        })

export const getContainer = 
    (element: HTMLElement): Container =>
        ({
            width: element.offsetWidth,
            height: element.offsetHeight,
            left: element.offsetLeft,
            top: element.offsetTop
        })
